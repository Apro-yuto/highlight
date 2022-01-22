import React from 'react'
import LocalMallIcon from '@mui/icons-material/LocalMall'
import LogoutIcon from '@mui/icons-material/Logout'
import { SidemenuLinks, SidemenuOptions } from '@/js/Types/Layout/Sidemenu'
import { Method } from '@inertiajs/inertia'

export const sidemenuLinks: SidemenuLinks[] = [
  {
    name: '商品管理',
    url: '/reg',
    icon: <LocalMallIcon />,
  },
]

export const sidemenuOptions: SidemenuOptions[] = [
  {
    name: 'ログアウト',
    url: '/logout',
    method: Method.POST,
    icon: <LogoutIcon />,
  },
]

export default undefined
