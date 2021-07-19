from flask import (
    Flask, g, request, session,
    send_from_directory,
    render_template, redirect
)
from uuid import uuid4
import os, sqlite3

app = Flask(__name__)
app.secret_key = b'SCIST_2020_FINAL_CTF'
flag = os.getenv('FLAG', 'FLAG_NOT_EXIST')

def db():
    db = getattr(g, '_database', None)
    if db is None:
        db = g._database = sqlite3.connect('/tmp/db.sqlite3')
    return db

@app.teardown_appcontext
def close_connection(exception):
    db = getattr(g, '_database', None)
    if db is not None:
        db.close()

@app.before_first_request
def initial_db():
    cursor = db().cursor()
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS links (
        user  TEXT NOT NULL,
        link  TEXT NOT NULL,
        name  TEXT NOT NULL
    )
    """)
    cursor.execute(f"DELETE FROM links where user = '{flag}'")
    cursor.execute(f"INSERT INTO links VALUES ('{flag}', '{flag}', 'flag')")
    db().commit()

@app.before_request
def check_session():
    if 'user' not in session:
        session['user'] = str(uuid4())

@app.route('/<filename>')
def leakfile(filename):
    return send_from_directory('.', filename)

@app.route('/')
def index():
    user = session['user']
    cursor = db().cursor()
    cursor.execute(f"SELECT link, name FROM links where user = '{user}'")
    links = cursor.fetchall()
    return render_template('index.html', links=links)

@app.route('/add', methods=["POST"])
def add():
    user = session['user']
    link = request.form.get('link', '')
    name = request.form.get('name', '')
    if link and name and user != link:
        cursor = db().cursor()
        cursor.execute("INSERT INTO links VALUES (?, ?, ?)", (user, link, name))
        db().commit()
    return redirect('/')


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=10002, debug=True)
