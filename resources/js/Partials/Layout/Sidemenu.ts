import { SidemenuOptions } from '@/js/Types/Layout/Sidemenu'
import { Inertia } from '@inertiajs/inertia'

const sidemenuLinkTransition = (link: SidemenuOptions): void => {
  Inertia.visit(link.url, {
    method: link.method,
  })
}

export default sidemenuLinkTransition
