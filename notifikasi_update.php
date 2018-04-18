<script language="javascript">
function refreshParent() {
  window.opener.location.href = window.opener.location.href;

  if (window.opener.progressWindow)
       
 {
    window.opener.progressWindow.close()
  }
}
window.onunload=refreshParent();
window.close();
</script>
