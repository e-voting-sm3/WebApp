import CandidatePage from './components/pages/CandidateComponent.vue'
import VotePage from './components/pages/VoteComponent.vue'
import ResultPage from './components/pages/ResultComponent.vue'
import ViewCandidatePage from './components/pages/ViewCandidateComponent.vue'
import DashboardPage from './components/pages/DashboardComponent.vue'
import LoginPage from './components/pages/LoginComponent.vue'
import RegisterPage from './components/pages/RegisterComponent.vue'
import TableCandidatePage from './components/pages/TableCandidate.vue'
import TableVoterPage from './components/pages/TableVoter.vue'

export const routes = [
    {
        path: "/",
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
    {
        path: "/tablecandidate",
        name: 'tablecandidate',
        component: TableCandidatePage
    },
    {
        path: "/tablevoter",
        name: 'tablevoter',
        component: TableVoterPage
    },
]