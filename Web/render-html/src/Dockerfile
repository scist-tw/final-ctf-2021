FROM python:3.9

WORKDIR /app
COPY requirements.txt .
RUN python -m pip install --no-cache-dir -r requirements.txt

COPY ./ ./

USER daemon
CMD uwsgi --wsgi-file main.py --callable app --http :80 --processes 8 --threads 4
