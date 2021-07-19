from flask import (
    Flask, request,
    render_template,
    render_template_string
)

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/preview', methods=['POST'])
def preview():
    html = request.form.get('HTML')
    return render_template_string(html)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=10003, debug=True)

# flag at /flag
