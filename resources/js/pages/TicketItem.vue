<template>
    <div>
        <v-card
    
    class="mx-auto"
  >
    <v-toolbar
      color="warning"
      dark
    >
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->

      <v-toolbar-title>Ticket# {{ticket.id}} [{{ticket.subject}}]</v-toolbar-title>

      <v-spacer></v-spacer>

      
        <!-- <v-chip
        class="ma-2"
        color="pink"
        label
        text-color="white"
        >
        <v-icon left>
            label
        </v-icon>
        {{ticket.created_at}}
        </v-chip> -->
   
        <!-- <select name="" id="">
          <option value="" v-for="(status, index) in statuses" :key="index">{{status.status_name}}</option>
        </select> -->

        <v-select dark class="mt-5"
          :items="statuses"
          v-model="currentStatus"
          v-on:change="updateStatus()"
          solo
        ></v-select>
    </v-toolbar>

    <v-list three-line>
      <template v-for="(item, index) in items">
        <v-subheader
          v-if="item.header"
          :key="item.header"
          v-text="item.header"
        ></v-subheader>

        <v-divider
          v-else-if="item.divider"
          :key="index"
          :inset="item.inset"
        ></v-divider>

        <v-list-item
          v-else
          :key="item.title"
        >
          <v-list-item-avatar>
            <v-img :src="item.avatar"></v-img>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title v-html="item.title"></v-list-item-title>
            <v-list-item-subtitle v-html="item.subtitle"></v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </template>
    </v-list>
  </v-card>
    </div>
</template>

<script>
export default {
    data(){
        return{
            id: this.$route.params.id,
            ticket: [],
            items: [
                    { header: 'Today' },
                    {
                      avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
                      title: 'Brunch this weekend?',
                      subtitle: `<span class="text--primary">Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?`,
                    },
                    { divider: true, inset: true },
                    {
                      avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
                      title: 'Summer BBQ <span class="grey--text text--lighten-1">4</span>',
                      subtitle: `<span class="text--primary">to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend.`,
                    },
                    
                  ],
                  statuses: [],
                  currentStatus: '',

        }
    },
    created(){
        this.apiDomain = location.host;
        this.fetchTicket();
        this.fetchStatuses();
    },
    methods:{
        fetchStatuses(){
            axios.get(`http://${this.apiDomain}/api/statuses`)
            .then(response => {
                this.statuses = response.data.data;
            });
        },
        fetchTicket(){
            axios.get(`http://${this.apiDomain}/api/ticket/${this.id}`)
            .then(response => {
                this.ticket = response.data.data;
                this.currentStatus = this.ticket.status.status_name;
            });
        },
        updateStatus(){
          console.log('updated');
        }
        
    }
}
</script>