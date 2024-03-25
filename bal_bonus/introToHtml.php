<!DOCTYPE html>
<html>
<head>
    <title>Interactive Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background-color: #e3f2fd;
        }
        #textDisplay {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #ffffff;
            border: none;
            border-radius: 8px;
            color: #424242;
            font-size: 24px;
            width: 80%;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        #textDisplay:hover {
            transform: scale(1.05);
        }
        #inputText, #goButton {
            padding: 15px;
            border: none;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 10px;
        }
        #inputText {
            margin-bottom: 5px;
        }
        button {
            background-color: #1976d2;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        button:hover {
            background-color: #1565c0;
            transform: translateY(-2px);
        }
    </style>
    <script>
        function displayText() {
            var text = document.getElementById('inputText').value;
            document.getElementById('textDisplay').innerText = text;
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('goButton').addEventListener('click', function() {
                var newWindow = window.open('', '_blank');
                newWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>New Page</title>
                    <style>
                        body {
                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            margin: 0;
                            padding: 20px;
                            background-color: #e3f2fd;
                            text-align: center;
                        }
                        p {
                            background-color: #ffffff;
                            color: #424242;
                            font-size: 24px;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                        }
                    </style>
                </head>
                <body>
                    <p>Hello Bal</p>
                </body>
                </html>`);
                newWindow.document.close(); // Ensure the new document is fully written
            });
        });
    </script>
</head>
<body>

    <div id="textDisplay"></div>
    <input type="text" id="inputText" placeholder="Enter your text here">
    <button onclick="displayText()">Display Text</button>
    <button id="goButton">Go</button>

</body>
</html>
