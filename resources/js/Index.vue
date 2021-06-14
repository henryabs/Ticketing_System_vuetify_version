<template>
    <div>
        <v-app id="inspire">
            <v-navigation-drawer
            v-model="drawer"
            app
             dark color="#284254">
                <v-list>
                    <v-alert tile class="text-h5 text-center warning">

                            <v-icon left x-large>speed</v-icon>
                            <!-- <span>Ticketing System</span> -->
                        
                    </v-alert>
                    <router-link v-for="(item, index) in listItems" :to="{name: item.link}" :key="index" class="r-link">
                        <v-list-item>
                            <v-list-item-icon>
                            <v-icon>{{item.icon}}</v-icon>
                            </v-list-item-icon>

                            <v-list-item-title>{{item.text}}</v-list-item-title>
                        </v-list-item>
                    </router-link>

                    
                    <v-list-group
                        :value="false"
                        no-action
                        sub-group
                        >
                        
                        <template v-slot:activator>
                            <v-list-item-content>
                            <v-list-item-title white--text>Reports</v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <router-link v-for="(item, index) in reportItems" :to="{name: item.link}" :key="index" class="r-link">
                            <v-list-item>
                                <v-list-item-icon>
                                <v-icon>{{item.icon}}</v-icon>
                                </v-list-item-icon>

                                <v-list-item-title>{{item.text}}</v-list-item-title>
                            </v-list-item>
                        </router-link>

                    </v-list-group>
                </v-list>
                <template v-slot:append>
        <div class="pa-2">
          <v-btn block small>
            <small>Copyright &copy; 2021 KHAIROTECH</small>
          </v-btn>
        </div>
      </template>

            </v-navigation-drawer>
            
            <v-app-bar app flat dark color="#284254">
            <v-app-bar-nav-icon @click="drawer = !drawer"><v-icon>menu</v-icon></v-app-bar-nav-icon>
                <v-toolbar-title>TICKETING SYSTEM</v-toolbar-title>
                <v-spacer></v-spacer>
                
                <v-btn icon>
                    <v-icon small>logout</v-icon>
                </v-btn>
                <v-menu
                    left
                    bottom
                >
                    <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        icon
                        v-bind="attrs"
                        v-on="on"
                    >
                        <v-icon>more_vert</v-icon>
                    </v-btn>
                    </template>

                    <v-list>
                    <v-list-item
                        v-for="n in 2"
                        :key="n"
                        @click="() => {}"
                    >
                        <v-list-item>Menu {{ n }}</v-list-item>
                    </v-list-item>
                    </v-list>
                </v-menu>
            </v-app-bar>

            <v-main>
                <v-container>
                    <router-view></router-view>
                </v-container>
            </v-main>
        </v-app>

    </div>
</template>

<script>
export default{
    data(){
        return {
            drawer: null,
            listItems: [
                {link: 'dashboard', text: 'Dashboard', icon: 'dashboard'},
                {link: 'logs', text: 'Logs', icon: 'history'},
            ],
            reportItems: [
                {link: 'top_issues', text: 'Top Issues', icon: 'notification_important'},
                {link: 'agent_reports', text: 'Agent Reports', icon: 'support_agent'},
                {link: 'ticket_reports', text: 'Ticket Reports', icon: 'memory'},
      ],
        }
    }
}
</script>

<style scoped>
    *{
        margin: 0;
        padding: 0;
    }
    .r-link{
        text-decoration: none;
    }
    .v-list-item__title{
        color: white !important;
    }
</style>