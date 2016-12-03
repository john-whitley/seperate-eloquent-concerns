all: test

composer.phar:
	wget https://getcomposer.org/composer.phar
	chmod a+x ./composer.phar

test: composer.phar
	./composer.phar test
