<script type="text/javascript">
const awayTimeout = 300000;
let activityTimer;
var userID = <?php echo json_encode($_SESSION['userID']); ?>

function setAwayStatus() {
    fetch('/api/v1/users/update-status.php', {
        method: 'POST',
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "status=away&user_id=" + userID
    })
    .then(response => response.text())
    .then(data => {
        console.log('User is now away:', data);
    })
    .catch(error => {
        console.error('Error setting status to away:', error);
    });
}

function setOnlineStatus() {
    fetch('/api/v1/users/update-status.php', {
        method: 'POST',
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "status=online&user_id=" + userID
    })
    .then(response => response.text())
    .then(data => {
        console.log('User is now away:', data);
    })
    .catch(error => {
        console.error('Error setting status to away:', error);
    });
}

function resetActivityTimer() {
    clearTimeout(activityTimer);
    setOnlineStatus();
    activityTimer = setTimeout(setAwayStatus, awayTimeout);
}

window.addEventListener('mousemove', resetActivityTimer);
window.addEventListener('keydown', resetActivityTimer);

resetActivityTimer();
</script>