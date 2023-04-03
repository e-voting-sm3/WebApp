import CandidatePage from './components/pages/CandidateComponent.vue'
import VotePage from './components/pages/VoteComponent.vue'
import ResultPage from './components/pages/ResultComponent.vue'
import Example from './components/ExampleComponent.vue'

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
        path: "/xample",
        name: 'xample',
        component: Example
    },
]