

//Close window 
function closeThis()
{
    if(confirm("Close Window?")){
        window.close();
    }
}

//Prevents form on re-submitting if user refreshes page in members.php
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

