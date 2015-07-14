# JsWidget

Simple UI widget.

Widget to demonstrate simple HTTP server polling and error handling. Renders a single DIV with text content that is updated on ever poll.  The polling stops if there are n failures.

Files:
  * liveWidget.js - The widget code.
  * index.php - Simple HTML file that demonstrates how to instantiate the widget. Throw this on a web server.
  * time.php - Data source for the widget.  Throw this a web server in the same domain.

Instantiate with:

1. A HTTP URL that provides JSON response text: <pre> {
  "status": {
    "code": 200,                          // 200 for sucess, otherwise and error
    "text": "error",                      // string representation of the error code
    "description": "There was a problem", // Descriptive text for the error
  },
  "data": {
    "00:00:00"                            // hours, minutes, seconds
  }
} </pre>

2. A name string.
3. A parent DOM element id.


Optional configuration parameters:
* debug: int                            // debug mask: LiveWidgetTest.LiveWidgetBase. [STATE | XHR | DOM]
* updateInterval: int                   // Server poll interval
* callbacks: <pre>{
    beforeActivate, function(),         // Return false to prevent activate
    afterActivate, function(),
    beforeSend: function (),            // Return false to prevent send
    afterSend: function (),
    beforeShow: function (),            // Return false to prevent show
    afterShow: function (),
    parseResponse: function(responseText, responseXML), // Parse the server response, otherwise the raw text is used.
  }</pre>

