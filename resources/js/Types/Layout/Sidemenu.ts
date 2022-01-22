import { Method } from '@inertiajs/inertia/types'

export interface SidemenuLinks {
  name: string
  url: string
  icon: React.ReactNode
}

export interface SidemenuOptions extends SidemenuLinks {
  method: Method.GET | Method.POST | Method.PUT | Method.PATCH
}

export default undefined
