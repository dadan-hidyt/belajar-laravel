<template>
  <div class="card rounded shaddow">
    <div class="card-header">
      <h1>List</h1>
    </div>
    <div class="card-body">
      <div class="index">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>Id</th>
            <th>title</th>
            <th>Amount</th>
            <th>Type</th>
            <th>action</th>

          </tr>
          </thead>
          <tbody>
          <tr v-for="(transaksi, index) in transaction.data" :key="index">
            <td>{{ transaksi.id }}</td>
            <td>{{ transaksi.title }}</td>
            <td>{{ transaksi.nominal }}</td>
            <td>{{ transaksi.type }}</td>
            <td>
              <router-link :to="{name:'update',params:{id:transaksi.id}}" class="btn btn-sm btn-warning">Update</router-link> &nbsp;
             <button class="btn btn-sm btn-danger" v-on:click="hapus(3)">Delete</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import {onMounted,ref} from "vue";

export default {
  setup() {
    let transaction = ref([]);
    onMounted(()=>{
        axios.get('http://127.0.0.1:8000/api/transaksi').then(function(e){
           transaction.value = e.data;
        }).catch(function(e){
            console.log(e)
        })
    });
    return {transaction};
  },
  methods : {
    hapus : function(e) {
      alert('hapus'+e)
    }
  }
}
</script>
