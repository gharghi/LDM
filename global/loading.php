hgljkhkhjjjjjjjjjjjjjjjjjjjjjjjjjjj
	
 Select Language​▼
HOME HTML CSS JAVASCRIPT JQUERY XML ASP.NET PHP SQL MORE... REFERENCES | EXAMPLES | FORUM | ABOUT
SHARE THIS PAGE
jQuery Tutorial
jQuery HOME
jQuery Intro
jQuery Install
jQuery Syntax
jQuery Selectors
jQuery Events
jQuery Effects
jQuery Hide/Show
jQuery Fade
jQuery Slide
jQuery Animate
jQuery stop()
jQuery Callback
jQuery Chaining
jQuery HTML
jQuery Get
jQuery Set
jQuery Add
jQuery Remove
jQuery CSS Classes
jQuery css()
jQuery Dimensions
jQuery AJAX
jQuery AJAX Intro
jQuery Load
jQuery Get/Post
jQuery Misc
jQuery noConflict()
jQuery Examples
jQuery Examples
jQuery Quiz
jQuery Certificate
jQuery References
jQuery Selectors
jQuery Events
jQuery Effects
jQuery HTML/CSS
jQuery AJAX
jQuery Misc
jQuery - AJAX get() and post() Methods
« PreviousNext Chapter »
The jQuery get() and post() methods is used to request data from the server with an HTTP GET or POST request.
HTTP Request: GET vs. POST
Two commonly used methods for a request-response between a client and server are: GET and POST.
GET - Requests data from a specified resource
POST - Submits data to be processed to a specified resource
GET is basically used for just getting (retrieving) some data from the server. Note: The GET method may return cached data.
POST can also be used to get some data from the server. However, the POST method NEVER caches data, and is often used to send data along with the request.
To learn more about GET and POST, and the differences between the two methods, please read our HTTP Methods GET vs POST chapter.
jQuery $.get() Method
The $.get() method requests data from the server with an HTTP GET request.
Syntax:
$.get(URL,callback);
The required URL parameter specifies the URL you wish to request.
The optional callback parameter is the name of a function to be executed if the request succeeds.
The following example uses the $.get() method to retrieve data from a file on the server:
Example
$("button").click(function(){
  $.get("demo_test.asp",function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
Try it yourself »
The first parameter of $.get() is the URL we wish to request ("demo_test.asp").
The second parameter is a callback function. The first callback parameter holds the content of the page requested, and the second callback parameter holds the status of the request.
Tip: Here is how the ASP file looks like ("demo_test.asp"):
<%
response.write("This is some text from an external ASP file.")
%>
jQuery $.post() Method
The $.post() method requests data from the server using an HTTP POST request.
Syntax:
$.post(URL,data,callback);
The required URL parameter specifies the URL you wish to request.
The optional data parameter specifies some data to send along with the request.
The optional callback parameter is the name of a function to be executed if the request succeeds.
The following example uses the $.post() method to send some data along with the request:
Example
$("button").click(function(){
  $.post("demo_test_post.asp",
  {
    name:"Donald Duck",
    city:"Duckburg"
  },
  function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
Try it yourself »
The first parameter of $.post() is the URL we wish to request ("demo_test_post.asp").
Then we pass in some data to send along with the request (name and city).
The ASP script in "demo_test_post.asp" reads the parameters, process them, and return a result.
The third parameter is a callback function. The first callback parameter holds the content of the page requested, and the second callback parameter holds the status of the request.
Tip: Here is how the ASP file looks like ("demo_test_post.asp"):
<%
dim fname,city
fname=Request.Form("name")
city=Request.Form("city")
Response.Write("Dear " & fname & ". ")
Response.Write("Hope you live well in " & city & ".")
%>
jQuery AJAX Reference
For a complete overview of all jQuery AJAX methods, please go to our jQuery AJAX Reference.
« PreviousNext Chapter »
WEB HOSTING
Best Web Hosting
eUK Web Hosting
UK Reseller Hosting
Cloud Hosting
Top Web Hosting
$3.98 Unlimited Hosting
250+ Hosting Apps
WEB BUILDING
XML Editor - Free Trial!
FREE Website BUILDER
FREE Website Creator
STATISTICS
Browser Statistics
OS Statistics
Display Statistics
Top 10 Tutorials
» HTML Tutorial
» HTML5 Tutorial
» CSS Tutorial
» CSS3 Tutorial
» JavaScript Tutorial
» jQuery Tutorial
» SQL Tutorial
» PHP Tutorial
» ASP.NET Tutorial
» XML Tutorial
Top 10 References
» HTML/HTML5 Reference
» CSS 1,2,3 Reference
» CSS 3 Browser Support
» JavaScript
» HTML DOM
» XML DOM
» PHP Reference
» jQuery Reference
» ASP.NET Reference
» HTML Colors
Examples
» HTML Examples
» CSS Examples
» XML Examples
» JavaScript Examples
» HTML DOM Examples
» XML DOM Examples
» AJAX Examples
» ASP.NET Examples
» Razor Examples
» ASP Examples
» SVG Examples	
Quizzes
» HTML Quiz
» XHTML Quiz
» CSS Quiz
» JavaScript Quiz
» jQuery Quiz
» XML Quiz
» ASP Quiz
» PHP Quiz
» SQL Quiz
Color Picker
 
Statistics
» Browser Statistics
» Browser OS
» Browser Display
 REPORT ERROR | HOME | TOP | PRINT | FORUM | ABOUT | ADVERTISE WITH US
W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.
Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content.
While using this site, you agree to have read and accepted our terms of use and privacy policy.
Copyright 1999-2013 by Refsnes Data. All Rights Reserved.
	
 Select Language​▼
HOME HTML CSS JAVASCRIPT JQUERY XML ASP.NET PHP SQL MORE... REFERENCES | EXAMPLES | FORUM | ABOUT
SHARE THIS PAGE
jQuery Tutorial
jQuery HOME
jQuery Intro
jQuery Install
jQuery Syntax
jQuery Selectors
jQuery Events
jQuery Effects
jQuery Hide/Show
jQuery Fade
jQuery Slide
jQuery Animate
jQuery stop()
jQuery Callback
jQuery Chaining
jQuery HTML
jQuery Get
jQuery Set
jQuery Add
jQuery Remove
jQuery CSS Classes
jQuery css()
jQuery Dimensions
jQuery AJAX
jQuery AJAX Intro
jQuery Load
jQuery Get/Post
jQuery Misc
jQuery noConflict()
jQuery Examples
jQuery Examples
jQuery Quiz
jQuery Certificate
jQuery References
jQuery Selectors
jQuery Events
jQuery Effects
jQuery HTML/CSS
jQuery AJAX
jQuery Misc
jQuery - AJAX get() and post() Methods
« PreviousNext Chapter »
The jQuery get() and post() methods is used to request data from the server with an HTTP GET or POST request.
HTTP Request: GET vs. POST
Two commonly used methods for a request-response between a client and server are: GET and POST.
GET - Requests data from a specified resource
POST - Submits data to be processed to a specified resource
GET is basically used for just getting (retrieving) some data from the server. Note: The GET method may return cached data.
POST can also be used to get some data from the server. However, the POST method NEVER caches data, and is often used to send data along with the request.
To learn more about GET and POST, and the differences between the two methods, please read our HTTP Methods GET vs POST chapter.
jQuery $.get() Method
The $.get() method requests data from the server with an HTTP GET request.
Syntax:
$.get(URL,callback);
The required URL parameter specifies the URL you wish to request.
The optional callback parameter is the name of a function to be executed if the request succeeds.
The following example uses the $.get() method to retrieve data from a file on the server:
Example
$("button").click(function(){
  $.get("demo_test.asp",function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
Try it yourself »
The first parameter of $.get() is the URL we wish to request ("demo_test.asp").
The second parameter is a callback function. The first callback parameter holds the content of the page requested, and the second callback parameter holds the status of the request.
Tip: Here is how the ASP file looks like ("demo_test.asp"):
<%
response.write("This is some text from an external ASP file.")
%>
jQuery $.post() Method
The $.post() method requests data from the server using an HTTP POST request.
Syntax:
$.post(URL,data,callback);
The required URL parameter specifies the URL you wish to request.
The optional data parameter specifies some data to send along with the request.
The optional callback parameter is the name of a function to be executed if the request succeeds.
The following example uses the $.post() method to send some data along with the request:
Example
$("button").click(function(){
  $.post("demo_test_post.asp",
  {
    name:"Donald Duck",
    city:"Duckburg"
  },
  function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
Try it yourself »
The first parameter of $.post() is the URL we wish to request ("demo_test_post.asp").
Then we pass in some data to send along with the request (name and city).
The ASP script in "demo_test_post.asp" reads the parameters, process them, and return a result.
The third parameter is a callback function. The first callback parameter holds the content of the page requested, and the second callback parameter holds the status of the request.
Tip: Here is how the ASP file looks like ("demo_test_post.asp"):
<%
dim fname,city
fname=Request.Form("name")
city=Request.Form("city")
Response.Write("Dear " & fname & ". ")
Response.Write("Hope you live well in " & city & ".")
%>
jQuery AJAX Reference
For a complete overview of all jQuery AJAX methods, please go to our jQuery AJAX Reference.
« PreviousNext Chapter »
WEB HOSTING
Best Web Hosting
eUK Web Hosting
UK Reseller Hosting
Cloud Hosting
Top Web Hosting
$3.98 Unlimited Hosting
250+ Hosting Apps
WEB BUILDING
XML Editor - Free Trial!
FREE Website BUILDER
FREE Website Creator
STATISTICS
Browser Statistics
OS Statistics
Display Statistics
Top 10 Tutorials
» HTML Tutorial
» HTML5 Tutorial
» CSS Tutorial
» CSS3 Tutorial
» JavaScript Tutorial
» jQuery Tutorial
» SQL Tutorial
» PHP Tutorial
» ASP.NET Tutorial
» XML Tutorial
Top 10 References
» HTML/HTML5 Reference
» CSS 1,2,3 Reference
» CSS 3 Browser Support
» JavaScript
» HTML DOM
» XML DOM
» PHP Reference
» jQuery Reference
» ASP.NET Reference
» HTML Colors
Examples
» HTML Examples
» CSS Examples
» XML Examples
» JavaScript Examples
» HTML DOM Examples
» XML DOM Examples
» AJAX Examples
» ASP.NET Examples
» Razor Examples
» ASP Examples
» SVG Examples	
Quizzes
» HTML Quiz
» XHTML Quiz
» CSS Quiz
» JavaScript Quiz
» jQuery Quiz
» XML Quiz
» ASP Quiz
» PHP Quiz
» SQL Quiz
Color Picker
 
Statistics
» Browser Statistics
» Browser OS
» Browser Display
 REPORT ERROR | HOME | TOP | PRINT | FORUM | ABOUT | ADVERTISE WITH US
W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.
Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content.
While using this site, you agree to have read and accepted our terms of use and privacy policy.
Copyright 1999-2013 by Refsnes Data. All Rights Reserved.
	
 Select Language​▼
HOME HTML CSS JAVASCRIPT JQUERY XML ASP.NET PHP SQL MORE... REFERENCES | EXAMPLES | FORUM | ABOUT
SHARE THIS PAGE
jQuery Tutorial
jQuery HOME
jQuery Intro
jQuery Install
jQuery Syntax
jQuery Selectors
jQuery Events
jQuery Effects
jQuery Hide/Show
jQuery Fade
jQuery Slide
jQuery Animate
jQuery stop()
jQuery Callback
jQuery Chaining
jQuery HTML
jQuery Get
jQuery Set
jQuery Add
jQuery Remove
jQuery CSS Classes
jQuery css()
jQuery Dimensions
jQuery AJAX
jQuery AJAX Intro
jQuery Load
jQuery Get/Post
jQuery Misc
jQuery noConflict()
jQuery Examples
jQuery Examples
jQuery Quiz
jQuery Certificate
jQuery References
jQuery Selectors
jQuery Events
jQuery Effects
jQuery HTML/CSS
jQuery AJAX
jQuery Misc
jQuery - AJAX get() and post() Methods
« PreviousNext Chapter »
The jQuery get() and post() methods is used to request data from the server with an HTTP GET or POST request.
HTTP Request: GET vs. POST
Two commonly used methods for a request-response between a client and server are: GET and POST.
GET - Requests data from a specified resource
POST - Submits data to be processed to a specified resource
GET is basically used for just getting (retrieving) some data from the server. Note: The GET method may return cached data.
POST can also be used to get some data from the server. However, the POST method NEVER caches data, and is often used to send data along with the request.
To learn more about GET and POST, and the differences between the two methods, please read our HTTP Methods GET vs POST chapter.
jQuery $.get() Method
The $.get() method requests data from the server with an HTTP GET request.
Syntax:
$.get(URL,callback);
The required URL parameter specifies the URL you wish to request.
The optional callback parameter is the name of a function to be executed if the request succeeds.
The following example uses the $.get() method to retrieve data from a file on the server:
Example
$("button").click(function(){
  $.get("demo_test.asp",function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
Try it yourself »
The first parameter of $.get() is the URL we wish to request ("demo_test.asp").
The second parameter is a callback function. The first callback parameter holds the content of the page requested, and the second callback parameter holds the status of the request.
Tip: Here is how the ASP file looks like ("demo_test.asp"):
<%
response.write("This is some text from an external ASP file.")
%>
jQuery $.post() Method
The $.post() method requests data from the server using an HTTP POST request.
Syntax:
$.post(URL,data,callback);
The required URL parameter specifies the URL you wish to request.
The optional data parameter specifies some data to send along with the request.
The optional callback parameter is the name of a function to be executed if the request succeeds.
The following example uses the $.post() method to send some data along with the request:
Example
$("button").click(function(){
  $.post("demo_test_post.asp",
  {
    name:"Donald Duck",
    city:"Duckburg"
  },
  function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
Try it yourself »
The first parameter of $.post() is the URL we wish to request ("demo_test_post.asp").
Then we pass in some data to send along with the request (name and city).
The ASP script in "demo_test_post.asp" reads the parameters, process them, and return a result.
The third parameter is a callback function. The first callback parameter holds the content of the page requested, and the second callback parameter holds the status of the request.
Tip: Here is how the ASP file looks like ("demo_test_post.asp"):
<%
dim fname,city
fname=Request.Form("name")
city=Request.Form("city")
Response.Write("Dear " & fname & ". ")
Response.Write("Hope you live well in " & city & ".")
%>
jQuery AJAX Reference
For a complete overview of all jQuery AJAX methods, please go to our jQuery AJAX Reference.
« PreviousNext Chapter »
WEB HOSTING
Best Web Hosting
eUK Web Hosting
UK Reseller Hosting
Cloud Hosting
Top Web Hosting
$3.98 Unlimited Hosting
250+ Hosting Apps
WEB BUILDING
XML Editor - Free Trial!
FREE Website BUILDER
FREE Website Creator
STATISTICS
Browser Statistics
OS Statistics
Display Statistics
Top 10 Tutorials
» HTML Tutorial
» HTML5 Tutorial
» CSS Tutorial
» CSS3 Tutorial
» JavaScript Tutorial
» jQuery Tutorial
» SQL Tutorial
» PHP Tutorial
» ASP.NET Tutorial
» XML Tutorial
Top 10 References
» HTML/HTML5 Reference
» CSS 1,2,3 Reference
» CSS 3 Browser Support
» JavaScript
» HTML DOM
» XML DOM
» PHP Reference
» jQuery Reference
» ASP.NET Reference
» HTML Colors
Examples
» HTML Examples
» CSS Examples
» XML Examples
» JavaScript Examples
» HTML DOM Examples
» XML DOM Examples
» AJAX Examples
» ASP.NET Examples
» Razor Examples
» ASP Examples
» SVG Examples	
Quizzes
» HTML Quiz
» XHTML Quiz
» CSS Quiz
» JavaScript Quiz
» jQuery Quiz
» XML Quiz
» ASP Quiz
» PHP Quiz
» SQL Quiz
Color Picker
 
Statistics
» Browser Statistics
» Browser OS
» Browser Display
 REPORT ERROR | HOME | TOP | PRINT | FORUM | ABOUT | ADVERTISE WITH US
W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.
Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content.
While using this site, you agree to have read and accepted our terms of use and privacy policy.
Copyright 1999-2013 by Refsnes Data. All Rights Reserved.
	
 Select Language​▼
HOME HTML CSS JAVASCRIPT JQUERY XML ASP.NET PHP SQL MORE... REFERENCES | EXAMPLES | FORUM | ABOUT
SHARE THIS PAGE
jQuery Tutorial
jQuery HOME
jQuery Intro
jQuery Install
jQuery Syntax
jQuery Selectors
jQuery Events
jQuery Effects
jQuery Hide/Show
jQuery Fade
jQuery Slide
jQuery Animate
jQuery stop()
jQuery Callback
jQuery Chaining
jQuery HTML
jQuery Get
jQuery Set
jQuery Add
jQuery Remove
jQuery CSS Classes
jQuery css()
jQuery Dimensions
jQuery AJAX
jQuery AJAX Intro
jQuery Load
jQuery Get/Post
jQuery Misc
jQuery noConflict()
jQuery Examples
jQuery Examples
jQuery Quiz
jQuery Certificate
jQuery References
jQuery Selectors
jQuery Events
jQuery Effects
jQuery HTML/CSS
jQuery AJAX
jQuery Misc
jQuery - AJAX get() and post() Methods
« PreviousNext Chapter »
The jQuery get() and post() methods is used to request data from the server with an HTTP GET or POST request.
HTTP Request: GET vs. POST
Two commonly used methods for a request-response between a client and server are: GET and POST.
GET - Requests data from a specified resource
POST - Submits data to be processed to a specified resource
GET is basically used for just getting (retrieving) some data from the server. Note: The GET method may return cached data.
POST can also be used to get some data from the server. However, the POST method NEVER caches data, and is often used to send data along with the request.
To learn more about GET and POST, and the differences between the two methods, please read our HTTP Methods GET vs POST chapter.
jQuery $.get() Method
The $.get() method requests data from the server with an HTTP GET request.
Syntax:
$.get(URL,callback);
The required URL parameter specifies the URL you wish to request.
The optional callback parameter is the name of a function to be executed if the request succeeds.
The following example uses the $.get() method to retrieve data from a file on the server:
Example
$("button").click(function(){
  $.get("demo_test.asp",function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
Try it yourself »
The first parameter of $.get() is the URL we wish to request ("demo_test.asp").
The second parameter is a callback function. The first callback parameter holds the content of the page requested, and the second callback parameter holds the status of the request.
Tip: Here is how the ASP file looks like ("demo_test.asp"):
<%
response.write("This is some text from an external ASP file.")
%>
jQuery $.post() Method
The $.post() method requests data from the server using an HTTP POST request.
Syntax:
$.post(URL,data,callback);
The required URL parameter specifies the URL you wish to request.
The optional data parameter specifies some data to send along with the request.
The optional callback parameter is the name of a function to be executed if the request succeeds.
The following example uses the $.post() method to send some data along with the request:
Example
$("button").click(function(){
  $.post("demo_test_post.asp",
  {
    name:"Donald Duck",
    city:"Duckburg"
  },
  function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
Try it yourself »
The first parameter of $.post() is the URL we wish to request ("demo_test_post.asp").
Then we pass in some data to send along with the request (name and city).
The ASP script in "demo_test_post.asp" reads the parameters, process them, and return a result.
The third parameter is a callback function. The first callback parameter holds the content of the page requested, and the second callback parameter holds the status of the request.
Tip: Here is how the ASP file looks like ("demo_test_post.asp"):
<%
dim fname,city
fname=Request.Form("name")
city=Request.Form("city")
Response.Write("Dear " & fname & ". ")
Response.Write("Hope you live well in " & city & ".")
%>
jQuery AJAX Reference
For a complete overview of all jQuery AJAX methods, please go to our jQuery AJAX Reference.
« PreviousNext Chapter »
WEB HOSTING
Best Web Hosting
eUK Web Hosting
UK Reseller Hosting
Cloud Hosting
Top Web Hosting
$3.98 Unlimited Hosting
250+ Hosting Apps
WEB BUILDING
XML Editor - Free Trial!
FREE Website BUILDER
FREE Website Creator
STATISTICS
Browser Statistics
OS Statistics
Display Statistics
Top 10 Tutorials
» HTML Tutorial
» HTML5 Tutorial
» CSS Tutorial
» CSS3 Tutorial
» JavaScript Tutorial
» jQuery Tutorial
» SQL Tutorial
» PHP Tutorial
» ASP.NET Tutorial
» XML Tutorial
Top 10 References
» HTML/HTML5 Reference
» CSS 1,2,3 Reference
» CSS 3 Browser Support
» JavaScript
» HTML DOM
» XML DOM
» PHP Reference
» jQuery Reference
» ASP.NET Reference
» HTML Colors
Examples
» HTML Examples
» CSS Examples
» XML Examples
» JavaScript Examples
» HTML DOM Examples
» XML DOM Examples
» AJAX Examples
» ASP.NET Examples
» Razor Examples
» ASP Examples
» SVG Examples	
Quizzes
» HTML Quiz
» XHTML Quiz
» CSS Quiz
» JavaScript Quiz
» jQuery Quiz
» XML Quiz
» ASP Quiz
» PHP Quiz
» SQL Quiz
Color Picker
 
Statistics
» Browser Statistics
» Browser OS
» Browser Display
 REPORT ERROR | HOME | TOP | PRINT | FORUM | ABOUT | ADVERTISE WITH US
W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.
Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content.
While using this site, you agree to have read and accepted our terms of use and privacy policy.
Copyright 1999-2013 by Refsnes Data. All Rights Reserved.
 