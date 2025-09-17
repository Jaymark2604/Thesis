<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>OJT Attendance</title>
  <link rel="icon" type="image/png" href="image/PLMUNLogo.png">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">
  <div class="grid grid-cols-12 gap-6 max-w-7xl mx-auto p-6">

       <!-- Include Sidebar -->
  <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="col-span-12 md:col-span-9 lg:col-span-10 bg-white rounded-2xl p-6 shadow-sm">

      <h1 class="text-2xl font-semibold mb-6">🛠️ OJT Attendance</h1>

      <!-- Attendance Box -->
      <div class="bg-gray-50 p-6 rounded-2xl shadow-sm max-w-xl mx-auto text-center">
        <!-- IN / OUT Buttons -->
        <div class="mb-4 flex justify-center gap-4">
          <button id="btnIn" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-xl text-lg shadow">
            🟢 IN
          </button>
          <button id="btnOut" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-xl text-lg shadow">
            🔴 OUT
          </button>
        </div>

        <!-- Current Time -->
        <div id="currentTime" class="text-xl font-bold text-gray-700 mb-4">--:-- --/--/----</div>
      </div>

      <!-- History Log -->
      <div class="bg-gray-50 p-6 rounded-2xl shadow-sm mt-6">
        <h2 class="text-lg font-semibold mb-3">⏱ Attendance History</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full border border-gray-200 text-center rounded-xl">
            <thead class="bg-indigo-50">
              <tr>
                <th class="px-4 py-2 border-b text-gray-700">Date</th>
                <th class="px-4 py-2 border-b text-gray-700">Time In</th>
                <th class="px-4 py-2 border-b text-gray-700">Time Out</th>
              </tr>
            </thead>
            <tbody id="historyTable">
              <tr><td colspan="3" class="py-3 text-gray-500">No records yet</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

<script>
let hasTimeIn = false; 
let hasTimeOut = false; 
let currentRow = null; 

function updateClock() {
  const now = new Date();
  document.getElementById("currentTime").textContent = 
    now.toLocaleTimeString() + " | " + now.toLocaleDateString();
}
setInterval(updateClock, 1000);
updateClock();

// Handle IN button
document.getElementById("btnIn").addEventListener("click", function() {
  if (hasTimeIn && !hasTimeOut) {
    alert("You already timed IN. Please time OUT before another IN.");
    return;
  }
  const now = new Date();
  const date = now.toLocaleDateString();
  const time = now.toLocaleTimeString();

  // Add new row
  currentRow = document.createElement("tr");
  currentRow.innerHTML = `<td class="border-b py-2">${date}</td><td class="border-b py-2">${time}</td><td class="border-b py-2">--:--</td>`;
  if (document.querySelector("#historyTable tr td[colspan]")) {
    document.getElementById("historyTable").innerHTML = ""; // clear "No records yet"
  }
  document.getElementById("historyTable").appendChild(currentRow);

  hasTimeIn = true;
  hasTimeOut = false;
});

// Handle OUT button
document.getElementById("btnOut").addEventListener("click", function() {
  if (!hasTimeIn) {
    alert("You must time IN before you can time OUT.");
    return;
  }
  if (hasTimeOut) {
    alert("You already timed OUT. Please come back later.");
    return;
  }
  const now =

