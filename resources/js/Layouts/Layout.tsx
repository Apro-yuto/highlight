import React, { ReactNode, useState } from 'react'
import Box from '@mui/material/Box'
import Header from '@/js/components/Header'
import Toolbar from '@mui/material/Toolbar'
import Sidemenu from '@/js/components/Sidemenu'
import MuiTheme from '@/js/components/theme/MuiTheme';
import { ThemeProvider } from '@mui/material'

const Layout: React.VFC<{ children: ReactNode }> = ({ children }) => {
  const [isOpen, toggleIsOpen]: [
    boolean,
    React.Dispatch<React.SetStateAction<boolean>>,
  ] = useState<boolean>(false)

  return (
    <ThemeProvider theme={MuiTheme}>
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
    </ThemeProvider>
  )
}

export default Layout
