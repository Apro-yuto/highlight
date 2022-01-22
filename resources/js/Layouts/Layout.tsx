import React, { ReactNode, useState } from 'react'
import Box from '@mui/material/Box'
import Header from '@/js/components/Header'
import Toolbar from '@mui/material/Toolbar'
import Sidemenu from '@/js/components/Sidemenu'

const Layout: React.VFC<{ children: ReactNode }> = ({ children }) => {
  const [isOpen, toggleIsOpen]: [
    boolean,
    React.Dispatch<React.SetStateAction<boolean>>
  ] = useState<boolean>(false)

  return (
    <main>
      <Header toggleIsOpen={() => toggleIsOpen(!isOpen)} />
      <Box sx={{ display: 'flex' }}>
        <Sidemenu isOpen={isOpen} />
        <Box component="main" sx={{ flexGrow: 1, p: 3 }}>
          <Toolbar />
          <section>{children}</section>
        </Box>
      </Box>
    </main>
  )
}

export default Layout
