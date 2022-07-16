<template>
  <div class="card rounded shadow">
    <div class="card-header">
      <h1>Tambah</h1>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <input class="form-control" type="text" id="formFileMultiple">
      </div>
      <div class="mb-3">
        <input class="form-control" type="text" id="formFileDisabled">
      </div>
      <div class="mb-3">
        <label for="formFileSm" class="form-label">Small file input example</label>
        <input class="form-control form-control-sm" id="formFileSm" type="text">
      </div>
      <div>
        <label for="formFileLg" class="form-label">Large file input example</label>
        <input class="form-control form-control-lg" id="formFileLg" type="text">
      </div>
      <div class="mt-3">
        <button class="btn btn-primary">tambah</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "tambah"
}
</script>

<style scoped>

</style>