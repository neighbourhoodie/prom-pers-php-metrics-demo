


## Flow

1. php-app → sends OTLP to `otel-collector:4318/v1/metrics`
2. Collector → applies the redaction processor.
3. Collector → exports sanitized data to Prometheus
4. Perses → queries Prometheus at http://prometheus:9090.
