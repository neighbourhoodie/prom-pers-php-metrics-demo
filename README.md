# Typo3 prometheus perses demo

The `compose.yml` sets up a prometheus and a perses container utilizing the official Docker Hub images.
The prometheus container is configured with a `prometheus/prometheus.yml`, which includes an OTLP (OpenTelemetry Protocol) section; this enables Prometheus to receive telemetry data directly from instrumented applications.
The Perses container is provided with its own configuration and is bound to port 8080 for access to the visualization.
To explore the collected metrics visually, the example repository can be checked out, and the containers started with:
```sh
docker compose up
```
Once the services are running:

- Prometheus is accessible at `http://localhost:9090`
- Perses is accessible at `http://localhost:8080`
