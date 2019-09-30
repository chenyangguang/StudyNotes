# docker question 
After Centos system install docker , we should do this job for "Cannot connect to the Docker daemon at unix:///var/run/docker.sock. Is the docker daemon running"  to  work.
```
$ systemctl daemon-reload
$ sudo service docker restart
$ sudo service docker status (should see active (running))
$ sudo docker run hello-world
```
