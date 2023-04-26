import CandidatePage from './components/pages/CandidateComponent.vue'
import VotePage from './components/pages/VoteComponent.vue'
import ResultPage from './components/pages/ResultComponent.vue'
import ViewCandidatePage from './components/pages/ViewCandidateComponent.vue'
import DashboardPage from './components/pages/DashboardComponent.vue'
import LoginPage from './components/pages/LoginComponent.vue'
import RegisterPage from './components/pages/RegisterComponent.vue'

export const routes = [
    {
        path: "/candidate",
        name: 'candidate',
        component: CandidatePage 
    },
    {
        path: "/vote",
        name: 'vote',
        component: VotePage
    },
    {
        path: "/result",
        name: 'result',
        component: ResultPage
    },
    {
        path: "/view",
        name: 'view',
        component: ViewCandidatePage
    },
    {
        path: "/dashboard",
        name: 'dashboard',
        component: DashboardPage
    },
    {
        path: "/login",
        name: 'login',
        component: LoginPage
    },
    {
        path: "/register",
        name: 'register',
        component: RegisterPage
    },
]