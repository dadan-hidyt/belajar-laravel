<template>
  <div class="card rounded shadow">
    <div class="card-header">
      <h1>Tambah</h1>
    </div>
    <p v-for="error in er" class="alert alert-danger">
      {{ error }}
    </p>
    <form @submit.prevent="store">
      <div class="card-body">
        <div class="mb-3">
          <label for="title">title</label>
          <input v-model="datas.title" class="form-control" type="text" id="title">
          <span v-if="error.title">{{error.title[0]}}</span>
        </div>
        <div class="mb-3">
          <label for="title">amount {{nominal}}</label>
          <input v-model="datas.nominal" class="form-control" type="number" id="title">
          <span v-if="error.nominal">{{error.nominal[0]}}</span>
        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Time</label>
          <input v-model="datas.time" class="form-control" id="formFileSm" type="date">
        </div>
        <div>
          <label for="formFileLg" class="form-label">Type</label>
          <select class="form-control" v-model="datas.type" id="">
            <option value="pengeluaran">pengeluaran</option>
            <option value="pemasukan">pemasukan</option>

          </select>
          <span v-if="error.type">{{error.type[0]}}</span>
        </div>
        <div class="mt-3">
          <button class="btn btn-primary">tambah</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import {reactive,ref} from "vue";
import {useRouter} from 'vue-router';
import axios from 'axios';
export default {
setup() {
  const datas = reactive({
      title : '',
      nominal : '',
      type : '',
  });
  const error = ref([]);
  const route = useRouter();
  function store() {
    axios.post('http://localhost:8080/api/simpan', datas,{
      headers: {"Access-Control-Allow-Origin": "*"}
    }).then(function(e){
      route.push('/');
    }).catch(function(e){
        error.value = e.response.data;
    })
  }
  return {
    datas,
    error,
    store
  }
}
}
</script>

<style scoped>

</style>