<?php
include('db_connect.php');

// Fetch all orders from the kitchen_orders table
$query = "SELECT * FROM kitchen_orders ORDER BY timestamp DESC";
$result = $conn->query($query);

// Output the orders in a table row format
while ($order = $result->fetch_assoc()):
?>
    <tr>
        <td><?php echo $order['id']; ?></td>
        <td><?php echo $order['room_number']; ?></td>
        <td><?php echo $order['order_description']; ?></td>
        <td id="order-status-<?php echo $order['id']; ?>">
            <?php echo ucfirst($order['status']); ?>
        </td>
        <td>
            <?php if ($order['status'] === 'pending'): ?>
                <!-- Mark as complete button -->
                <button type="button" class="button" onclick="markAsComplete(<?php echo $order['id']; ?>)">Mark as Complete</button>
            <?php else: ?>
                Sent to Front Desk
            <?php endif; ?>
        </td>
    </tr>
<?php endwhile; ?>
