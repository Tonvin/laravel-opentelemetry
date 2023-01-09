<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use OpenTelemetry\Contrib\Otlp\OtlpHttpTransportFactory;
use OpenTelemetry\Contrib\Otlp\SpanExporter;
use OpenTelemetry\SDK\Trace\SpanExporter\ConsoleSpanExporter;
use OpenTelemetry\SDK\Trace\SpanProcessor\SimpleSpanProcessor;
use OpenTelemetry\SDK\Trace\TracerProvider;

class MetryService
{

    public $rootSpan = null;

    public $rootScope = null;

    public $trancer = null;

    public $spans = [];

    public $scopes = [];

    public function __construct()
    {
		putenv('OTEL_SERVICE_NAME=Laravel');
		$transport = (new OtlpHttpTransportFactory())->create('http://localhost:4318/v1/traces', 'application/x-protobuf');
		$exporter = new SpanExporter($transport);

		$tracerProvider =  new TracerProvider(
			new SimpleSpanProcessor(
				$exporter
			)
		);
		$this->tracer = $tracerProvider->getTracer('io.opentelemetry.contrib.php');
		$this->rootSpan = $this->tracer->spanBuilder('root')->startSpan();
		$this->rootScope = $this->rootSpan->activate();
    }

    public function start($span)
    {
        $this->spans[$span]  = $this->tracer->spanBuilder($span)->startSpan();
        $this->scopes[$span] = $this->spans[$span]->activate();
    }

    public function stop($span)
    {
        $this->spans[$span]->end();
        $this->scopes[$span]->detach();
    }

    public function __destruct()
    {
		$this->rootSpan->end();
		$this->rootScope->detach();
    }
}
