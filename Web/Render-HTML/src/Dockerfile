FROM python:3.9

WORKDIR /app
COPY requirements.txt .
RUN python -m pip install --no-cache-dir -r requirements.txt

COPY ./ ./

USER daemon
CMD gunicorn -b 0.0.0.0:80 main:app
