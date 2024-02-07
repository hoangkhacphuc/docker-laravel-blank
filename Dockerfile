# FROM <tên image>:<version> # Chọn image để build image

# RUN <câu lệnh> # Chạy lệnh khi build image

# WORKDIR /<đường dẫn trong image> # Set thư mục làm việc mặc định
# EXPOSE <port> # Mở port

# ADD ./<tên file> /<đường dẫn trong image>
# ENTRYPOINT [ "httpd" ] # Chạy tiến trình nào khi khởi động container
# CMD [ "-D", "FOREGROUND" ] # Tham số cho tiến trình khi khởi động container
