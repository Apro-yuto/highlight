import { SidemenuOptions } from '@/js/Types/Layout/Sidemenu'
import { Inertia } from '@inertiajs/inertia'

const linkToOptions = (link: SidemenuOptions): void => {
  Inertia.visit(link.url, {
    method: link.method,
  })
}

export default linkToOptions
