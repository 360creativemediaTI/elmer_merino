<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football League API</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div id="app" class="container mt-4">
        <div class="row">
            
            <token-switcher></token-switcher>
            <!-- Column for Forms -->
            <div class="col-md-6">
                <create-player-form></create-player-form>
                <create-league-form></create-league-form>
                <create-team-form></create-team-form>
                <assign-player-to-team></assign-player-to-team>

            </div>
            <!-- Column for Listados -->
            <div class="col-md-6">
                <teams-list></teams-list>
                <players-list></players-list>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
