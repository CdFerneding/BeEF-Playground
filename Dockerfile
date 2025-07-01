FROM kalilinux/kali-rolling

# Set working directory
WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    ruby-dev \
    php \
    php-cli \
    sudo \
    curl \
    unzip \
    build-essential

# Clone and install BeEF
RUN git clone https://github.com/beefproject/beef && \
    gem install bundler && \
    gem install xmlrpc && \
    cd beef && \
    bundle install

# Set a known password in beef/config.yaml (e.g. "beef:beef")
RUN sed -i 's/^\(\s*passwd:\s*\).*$/\1"mybeefpasswd"/' beef/config.yaml

# Copy example PHP files
COPY examples/ /app/examples

# Expose ports:
# - 80 for the PHP server
# - 3000 and 6789 for BeEF (default)
EXPOSE 80 3000 6789

# Start both PHP server and BeEF using a script
CMD ["bash", "-c", "\
php -S 0.0.0.0:80 -t /app/examples & \
cd /app/beef && ./beef"]
