sudo chmod 666 /var/run/docker.sock &&
docker build -t admin-container . &&
docker run -d -p 9003:9003 admin-container:latest --network host --name admin-service --restart=always
