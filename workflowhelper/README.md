=======
Workflow helper
======
A javascript bookmarklet for staff working with the DSpace (XMLUI) submissions workflow. It aims to make work easier by:

* hiding the "Archived Submissions" section
* making all tables on the page sortable 
* automatically sorting tasks in the pool by oldest first

Uses a modified version of Table sorting script 1.5.7 by Joost de Valk (original at http://www.joostdevalk.nl/code/sortable-table/ distributed under MIT licence).

Has been tested in DSpace 3.1 and 5.2 (XMLUI only) on Firefox, Chrome and IE.

Installation
------------
1. Save the files to a php-enabled, https-enabled server of your choice (though see notes below).
1. Create a bookmark in the browser of your choice, and paste the following code into the URL/location (modifying the path as appropriate):
```javascript:(function(){var%20s=document.createElement('script');s.id='workflowhelper';s.src='https://example.com/path/to/workflowhelper.js.php';document.body.appendChild(s);})();
```

Use
------------
1. Navigate to your DSpace "Submissions" page.
1. Click the bookmarklet.
1. Click on any table header to sort that table.
1. Refresh the page to remove all sorting. The bookmarklet needs to be clicked each time you visit the page.

Notes
------------
Currently the php functions are limited to including the sorting script so you could just include this manually if you wanted and run it as a plain javascript file. Future versions may have more php functionality.

https:// path in the bookmarklet is to avoid your browser disabling insecure content, assuming your submissions page is running over https too.

Potential for development
------------
1) Modify so it can be included in the DSpace page itself

* only taking effect on the submissions page
* triggered by a button on the page
* remembering each user's previous state (based on cookies)

2) Functionality to allow note-taking for items

3) Version for JSPUI