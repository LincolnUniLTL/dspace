/* Helper function */
function getElementsByClass (string,containerId) {  // Returns array
  var classElements = new Array();
  ( containerId === undefined ) ? containerId = document : containerId = document.getElementById(containerId);
  var allElements = containerId.getElementsByTagName('*');
  for (var i = 0; i < allElements.length; i++) {
    var multiClass = allElements[i].className.split(' ');
    for (var j = 0; j < multiClass.length; j++)
      if (multiClass[j] === string)
        classElements[classElements.length] = allElements[i];
  }
  return classElements;
}


/* Hide Archived Submissions */
var archivedSubmissions = document.getElementById("aspect_submission_Submissions_div_completed-submissions");
if (archivedSubmissions) {
	var restoreArchived = document.createElement("a");
	restoreArchived.id = "restoreArchived";
	archivedSubmissions.parentNode.insertBefore(restoreArchived, archivedSubmissions.previousSibling);
	hideArchived();
}

function hideArchived() {
	s=document.getElementById('aspect_submission_Submissions_div_completed-submissions');
	s.style.display = 'none';
	y=document.getElementById('restoreArchived');
	y.innerHTML='Show archived submissions';
	y.href="javascript:(function(){showArchived();})();";
}

function showArchived() {
	s=document.getElementById('aspect_submission_Submissions_div_completed-submissions');
	s.style.display = 'block';
	y=document.getElementById('restoreArchived');
	y.innerHTML='Hide archived submissions';
	y.href="javascript:(function(){hideArchived();})();";
}


/* Make tables sortable (and deduplicate the "Workflow tasks" table IDs) */
var tables = getElementsByClass("ds-table");
var dupTables = [];
for (var i=0; i<tables.length; i++) {
	tables[i].className = tables[i].className + " sortable";
	if (tables[i].id == "aspect_workflow_Submissions_table_workflow-tasks") {
		dupTables.push(tables[i]);
	}
}
if (dupTables[0]) { dupTables[0].id = "aspect_workflow_Submissions_table_owned-tasks"; }
if (dupTables[1]) { dupTables[1].id = "aspect_workflow_Submissions_table_pool-tasks"; }

/* BEGIN inclusion of Table sorting script  by Joost de Valk */
<?php include "sortable.js"; ?>
/* END inclusion of Table sorting script  by Joost de Valk */

/* Add workflow IDs to each table row, to allow for chronological sorting */
var rows = document.getElementsByTagName("tr");
for (i=0; i<rows.length; i++) {
	if (rows[i].children[0].children[0] != null && rows[i].children[0].children[0].className == 'ds-checkbox-field') {
		workflowID = rows[i].children[0].children[0].children[1].children[0].value;
		newSpan = document.createElement("span");
		newSpan.innerHTML = workflowID;
		rows[i].children[0].insertBefore(newSpan, rows[i].children[0].children[0]);
	}
}


/* Automatically sort tasks in the pool by oldest first */
var poolTable = document.getElementById('aspect_workflow_Submissions_table_pool-tasks').children[0].children[0].children[0].children[0];
ts_resortTable(poolTable,'0');