import React, { ReactNode } from 'react'
import Box from '@mui/material/Box'
import Header from '@/js/components/Header'
import Toolbar from '@mui/material/Toolbar'
import Sidemenu from '@/js/components/Sidemenu'

interface Props {
  children: ReactNode
}

const Layout: React.VFC<Props> = ({ children }) => {
  return (
    <main>
      <Header />
      <Sidemenu />
      <Box sx={{ display: 'flex' }}>
        <Box component="main" sx={{ flexGrow: 1, p: 3 }}>
          <Toolbar />
          <section>
            {children}
          </section>
        </Box>
      </Box>
    </main>
  )
}

export default Layout
