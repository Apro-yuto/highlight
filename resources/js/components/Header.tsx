import React from 'react'
import { Link } from '@inertiajs/inertia-react'
import AppBar from '@mui/material/AppBar'
import Toolbar from '@mui/material/Toolbar'
import Box from '@mui/material/Box'
import Styles from '@/sass/Layout/Header.module.scss'
import IconButton from '@mui/material/IconButton'
import Button from '@mui/material/Button'
import MenuIcon from '@mui/icons-material/Menu'

const Header: React.VFC = () => {
  return (
    <Box>
      <AppBar position="static">
        <Toolbar className={Styles.appBar} variant="dense">
          <Button>
            <Link className={Styles.title} href="/reg" as="a">
              HIGHLIGHT
            </Link>
          </Button>
          <Button sx={{ ml: 'auto' }}>
            <Link className={Styles.link} href="/logout" as="a" method="POST">
              LOGOUT
            </Link>
          </Button>
          <IconButton
            className={Styles.icon}
            size="medium"
            edge="start"
            aria-label="menu"
            sx={{ ml: 'auto' }}
          >
            <MenuIcon />
          </IconButton>
        </Toolbar>
      </AppBar>
    </Box>
  )
}

export default Header
