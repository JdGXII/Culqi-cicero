var express = require("express");
var app = express();
var port = process.env.PORT || 3000;

app.use(express.static('public'));

app.get("/", function (req, res) {
    res.sendFile(__dirname + '/views/index.html');
});

app.get('/show-buttons', (req, res) => {
   const {userId} = req.query;
   const displayUrl = '';
   res.json({
       "messages":[
      {
        "attachment": {
          "type": 'template',
          "payload": {
            "template_type": 'generic',
            "image_aspect_ratio": 'square',
            "elements": [
             {
              "title": `Realiza el pago y descarga tu contrato`,
              "subtitle": '',
              "buttons":[
                {
                  "type": 'web_url',
                  "url": 'https://bardountiveros.000webhostapp.com/contratodearrendamiento.php', //dominio https seguro, como pide facebook
                  "title": 'title',
                  "messenger_extensions": true,
                  "webview_height_ratio": 'tall' // Medium view
                }
              ]
            }]
          }
        }
      }
  ]});
});

app.get('/show-webview', (req, res) => {
   res.sendFile(__dirname + '/views/index.html');
});

app.post('/broadcast-to-chatfuel', (req, res) => {
    res.json({});
});

app.listen(port);