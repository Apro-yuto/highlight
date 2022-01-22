import React, { ReactNode } from 'react'
import {
  Drawer,
  List,
  ListItem,
  ListItemIcon,
  ListItemText,
  Divider,
  Toolbar,
  Box,
} from '@mui/material'
import {
  sidemenuLinks,
  sidemenuOptions,
} from '@/js/Constants/Layout/sidemenuLinks'
import linkToOptions from '@/js/Partials/Layout/Sidemenu'
import { isBreakePoints } from '@/js/Partials/useGetWindowSize'

// sideMenuをレスポンシブ化した時に使用する属性を変更する - nagashima
const SideMenuWrapper: React.VFC<{ children: ReactNode; isOpen: boolean }> = ({
  children,
  isOpen,
}) => {
  const { isSp }: { isSp: boolean } = isBreakePoints()

  // SPのウィンドウサイズになったらsidemenuを100%にする。PCは300pxで表示する。 - nagashima
  const sidemenuWidth = isSp ? '100%' : 300

  // 動的な属性群 - nagashima
  const anchor = isSp ? 'right' : ''
  const open = isSp ? isOpen : ''

  return (
    <Drawer
      variant={isSp ? 'temporary' : 'permanent'}
      {...(anchor && { anchor })}
      {...(open && { open })}
      sx={{
        width: sidemenuWidth,
        flexShrink: 0,
        ['& .MuiDrawer-paper']: {
          width: sidemenuWidth,
          boxSizing: 'border-box',
        },
      }}
    >
      {children}
    </Drawer>
  )
}

// sidemenu本体 - nagashima
const Sidemenu: React.VFC<{ isOpen: boolean }> = ({ isOpen }) => {
  return (
    <>
      <Toolbar />
      <SideMenuWrapper isOpen={isOpen}>
        <Toolbar />

        <Box sx={{ overflow: 'auto' }}>
          <List>
            {sidemenuLinks.map((link, index) => (
              <ListItem button key={index}>
                <ListItemIcon>{link.icon}</ListItemIcon>
                <ListItemText primary={link.name} />
              </ListItem>
            ))}
          </List>

          <Divider />

          <List>
            {sidemenuOptions.map((link, index) => (
              <ListItem button onClick={() => linkToOptions(link)} key={index}>
                <ListItemIcon>{link.icon}</ListItemIcon>
                <ListItemText primary={link.name} />
              </ListItem>
            ))}
          </List>
        </Box>
      </SideMenuWrapper>
    </>
  )
}

export default Sidemenu
