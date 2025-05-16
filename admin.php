<div class="section">
    <h2>InviteApp Admin Panel</h2>
    <p>View and manage issued invite tokens below.</p>

    <table class="grid" style="width:100%; margin-top: 1rem;">
        <thead>
            <tr>
                <th>Token</th>
                <th>Email</th>
                <th>Group</th>
                <th>Expires</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($_['tokens'] as $token): ?>
            <tr>
                <td><?php p($token['token']); ?></td>
                <td><?php p($token['email']); ?></td>
                <td><?php p($token['group']); ?></td>
                <td><?php p($token['expires']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
