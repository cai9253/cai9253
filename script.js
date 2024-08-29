/* Reset some default styles */
body, h1, h2, p, ul, li {
    margin: 0;
    padding: 0;
}

/* General styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
}

header {
    background: #3a1297;
    color: #fff;
    padding: 10px 0;
}

header .container {
    width: 80%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

main {
    padding: 20px 0;
}

main .container {
    width: 80%;
    margin: 0 auto;
}

section {
    margin-bottom: 20px;
}

form {
    display: grid;
    gap: 10px;
}

form label {
    display: block;
}

form input, form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
}

form button {
    padding: 10px 20px;
    background-color: #3a1297;
    color: #fff;
    border: none;
    cursor: pointer;
}

footer {
    background: #3a1297;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

footer .container {
    width: 80%;
    margin: 0 auto;
}
@media (max-width: 768px) {
    header .container {
        flex-direction: column;
        align-items: flex-start;
    }

    nav ul {
        flex-direction: column;
    }

    nav ul li {
        margin: 10px 0;
    }
}

h2{
    text-align: center;
}
hr{
    width: 100px;
    margin: 10px auto;
}
.members{
    display: flex;
    justify-content: center;
    align-items: center;
}
.team-mem{
    margin: 8px;
}
img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 40px;
}
h4,p{
    text-align: center;
    font-size: 12px;
    margin: auto;
}
ul{
    text-align: center;
    font-size: 12px;
    margin: auto;
}
