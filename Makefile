.PHONY: all test dumpautoload

all: test

composer.phar:
	wget https://getcomposer.org/composer.phar
	chmod a+x ./composer.phar

dumpautoload: composer.phar
	./composer.phar dumpautoload

test: composer.phar dumpautoload
	./composer.phar test
