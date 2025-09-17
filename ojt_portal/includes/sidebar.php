<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$first_name = $_SESSION['first_name'] ?? 'Guest';
$last_name = $_SESSION['last_name'] ?? '';
$student_number = $_SESSION['student_number'] ?? '';
$course = $_SESSION['course'] ?? '';

$menu = [
  ['name' => 'Home', 'icon' => '🏠', 'link' => 'student_dashboard.php'],
  ['name' => 'Consultation', 'icon' => '💬', 'link' => 'consultation.php'],
  ['name' => 'Calendar', 'icon' => '📅', 'link' => 'calendar.php'],
  ['name' => 'OJT', 'icon' => '🛠️', 'link' => 'OJT.php'],
  ['name' => 'Account', 'icon' => '👤', 'link' => 'account.php']
];

$active = basename($_SERVER['PHP_SELF']);
?>

<aside class="sidebar col-span-12 md:col-span-3 lg:col-span-2 bg-white rounded-2xl p-4 shadow-sm flex flex-col justify-between">
<div>
    <!-- Logo -->
    <div class="flex items-center gap-3 px-2 mb-6">
        <img src="image/PLMUNLogo.png" alt="PLMUN Logo" class="w-10 h-10 rounded-lg object-cover">
        <div>
            <div class="font-semibold"><?= htmlspecialchars("$last_name, $first_name") ?></div>
            <div class="text-xs text-gray-500"><?= htmlspecialchars("$student_number - $course") ?></div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="space-y-1">
      <?php foreach ($menu as $item): 
        $isActive = $active === $item['link'];
      ?>
        <a href="<?= $item['link'] ?>" 
          class="flex items-center gap-3 px-3 py-2 rounded-xl transition hover:bg-gray-100 
                <?= $isActive ? 'bg-gray-100 font-semibold text-indigo-600' : '' ?>">
          <span class="text-lg"><?= $item['icon'] ?></span>
          <span class="text-sm"><?= $item['name'] ?></span>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>

  <!-- User Info -->
  <div class="pt-4 border-t text-sm text-gray-700">
    <p class="mb-2">Welcome, <span class="font-semibold"><?= htmlspecialchars($first_name) ?></span></p>
    <a href="logout.php" class="logout-btn text-red-500 hover:underline">Logout</a>
  </div>
</aside>
