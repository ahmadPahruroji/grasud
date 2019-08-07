<template>
   <div>
    <div class="alert alert-info">
        <strong>Iuran</strong>
        <button type="button" class="btn btn-primary pull-right" @click="add()"><i class="fa fa-plus"></i> Tambah</button>
    </div>
    <div class="row">
        <div class="col-sm-4" v-for="(countribution,r) in countributions">
            <div class="card">
                <div class="card-header">
                    <h5> Iuran</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control"   :name="'countributions['+r+'][user_id]'">
                            <option value="">--Pilih Pengguna--</option>
                            <option  v-for="(user,u) in users" :value="user.id">{{ user.name }}
                            </option>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Iuran</label>
                        <input type="number" class="form-control" :name="'countributions['+r+'][money]'" v-model="countribution.money" placeholder="type something" value="75000" required> 
                    </div>

                    <div class="form-group">
                        <select class="form-control"   :name="'countributions['+r+'][payment]'">
                            <option value="">--Pilih Metode Pembayaran--</option>
                            <option value="">cash</option>
                            <option value="">transfer</option>
                            <!-- <option  v-for="(user,u) in users" :value="user.id">{{ user.name }}
                            </option> -->  
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Bulan</label>
                        <input type="text" class="form-control" :name="'countributions['+r+'][month]'" v-model="countribution.month" placeholder="type something" value="" required> 
                    </div>
                    <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" :name="'countributions['+r+'][date]'" v-model="countribution.date" placeholder="type something" required> 
                        </div>
                    <button type="button" @click="remove(r)" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>   
                </div>
            </div>
        </div> 
    </div>
</div>
</template>

<script>
export default {
    props:['edit_countributions'],
    data(){
        return {
            countributions:[{}],
            users:[{}],
            user_selected:null
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created(){
        this.read();
        console.log("Iuran nya ",this.countributions);
    },
    methods:{
        add(){
            this.countributions.push({});
        },
        remove(index){
            this.countributions.splice(index,1);
        },
        read(){
                    // console.log('read');
                    axios.get('/api/users/').then(result=>{
                        console.log(result);
                        this.users = result.data;
                    },err=>{
                        console.log(err);
                    });
                }
            }
        }
        </script>
