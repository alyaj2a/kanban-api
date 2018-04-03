.PHONY: up in deploy update
	# SHELL := /bin/bash # Use bash syntax

up:
	docker-compose up

up-production:
	docker-compose up -d

in:
	docker exec -it $(shell docker-compose ps | grep php | cut -d" " -f 1) /bin/bash
