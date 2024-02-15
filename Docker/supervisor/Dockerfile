FROM okteto/supervisor:0.2.1
ADD file:dc794c2febce9ec5b68ca4f55027eb4e7d42fc7941e15ba578585d8a166d2d13 in / 
CMD ["sh"]
COPY /app/supervisor /usr/local/bin/supervisor
RUN /bin/sh -c chmod +x /usr/local/bin/supervisor