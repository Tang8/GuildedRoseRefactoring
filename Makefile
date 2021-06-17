.DEFAULT_GOAL := help

PHP_RUN=php
COMPOSER=composer
CURRENT_DIR := $(shell pwd)
INIT_DIR=fixtures/init.php

.PHONY: help
help:
	@echo ""
	@echo "Guilded Project available command: "
	@echo ""
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

####################################################### Docker     #####################################################

.PHONY: start
start: ## Run make start DAYS=days-number
	$(PHP_RUN) $(INIT_DIR) ${DAYS}

.PHONY: fix-cs
check-cs :
	${COMPOSER} check-cs

.PHONY: fix-cs
fix-cs:
	${COMPOSER} fix-cs

.PHONY: phpstan 
phpstan :
	${COMPOSER} phpstan

.PHONY: test 
test :
	${COMPOSER} test

.PHONY: coverage 
coverage :
	${COMPOSER} test-coverage

.PHONY: install
install:
	${COMPOSER} install