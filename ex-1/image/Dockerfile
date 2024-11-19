FROM php:8.3
WORKDIR /app
RUN echo "<?php echo 'Hello world!';" > /app/index.php
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000"]
