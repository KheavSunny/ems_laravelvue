<template>
  <div>
    <div class="text-5xl">View Attendances</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Date</th>
            <th v-for="num in 6" :key="num">T{{ num }}</th>
            <th>Total</th>
            <th>Overtimes</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Sunny</td>
            <td>2022-06-07</td>
            <td>08:00</td>
            <td>12:00</td>
            <td>13:00</td>
            <td>17:00</td>
            <td>18:00</td>
            <td>19:00</td>
            <td>1</td>
            <td>01:00:00</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Song</td>
            <td>2022-06-07</td>
            <td>08:00</td>
            <td>12:00</td>
            <td>13:00</td>
            <td>17:00</td>
            <td>18:00</td>
            <td>19:00</td>
            <td>1</td>
            <td>01:00:00</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Manut</td>
            <td>2022-06-07</td>
            <td>08:00</td>
            <td>12:00</td>
            <td>13:00</td>
            <td>17:00</td>
            <td>18:00</td>
            <td>19:00</td>
            <td>1</td>
            <td>01:00:00</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
</style>
