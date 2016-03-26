FROM diegomarangoni/hhvm:fastcgi

MAINTAINER "Emil Bay"

ENV WP_ROOT /opt/wordpress
ENV COMPOSER_VERSION 1.0.0-beta1

# Add HHVM configuration
COPY etc/hhvm/php.ini /etc/hhvm/php.ini

# Install Composer
RUN apt-get update && apt-get install -y \
    curl \
    git \
 && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | \
    hhvm --php - -- \
            --install-dir=/usr/local/bin \
            --filename=composer \
            --version=${COMPOSER_VERSION}

# Setup project
RUN mkdir -p ${WP_ROOT}
# Cache composer installation individually
COPY opt/wordpress/composer.json ${WP_ROOT}/composer.json
RUN cd ${WP_ROOT} && composer install

COPY opt/wordpress ${WP_ROOT}
RUN rm -r ${WP_ROOT}/wordpress/wp-content

# Set the content files to readable by all and
# expose the wordpress directory as a volume
RUN chmod -R 755 /opt/wordpress/content
VOLUME /opt/wordpress
